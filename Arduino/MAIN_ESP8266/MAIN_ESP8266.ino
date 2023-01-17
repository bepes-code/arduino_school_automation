 //Bepes copiright
//Incluim les llibreries que farem servir
#include <SoftwareSerial.h>
#include <avr/power.h>
#include <dht11.h>
#include <IRremote.h>
#include <Wire.h>       

//Definim els pins que farem servir
#define ESP8266_RX 10  
#define ESP8266_TX 11 
#define DHT11PIN 12

int LED1 = 2; // Conectem el led al Num 2 
int PIR = 4; // Conectem el sesnor pir al Num 4
int Rele = 6; // Conectem el rele al Num 6
IRsend sender(5);


// Definició de llibreries

dht11 DHT11 ;


//Variables per conectar al Wifi + Servidor
const char SSID_ESP[] = "Wifi"; // Nom de la xarxa      
const char SSID_KEY[] = "Password"; // Contrasenya de la xarxa
const char* host = "";   // Susbsituir la ip per la IP local del solans si estem contectats  a la wifi del institut
String NOOBIX_id = "123456"; // ID de la clase                  
String NOOBIX_password = "123456"; // Password de la clase       
String location_url = "";          

 
//Variables per al codi
String url = "";
String URL_withPacket = "";    
unsigned long multiplier[] = {1,10,100,1000,10000,100000,1000000,10000000,100000000,1000000000};
//Modes per al ESP
const char CWMODE = '1';//CWMODE 1=STATION, 2=APMODE, 3=BOTH
const char CIPMUX = '1';//CWMODE 0=Single Connection, 1=Multiple Connections
boolean setup_ESP();
boolean read_until_ESP(const char keyword1[], int key_size, int timeout_val, byte mode);
void timeout_start();
boolean timeout_check(int timeout_ms);
void serial_dump_ESP();
boolean connect_ESP();
void connect_webhost();
unsigned long timeout_start_val;
char scratch_data_from_ESP[20];
char payload[200];
byte payload_size=0, counter=0;
char ip_address[16];


//Variables que enviem
bool llum_rebuda_arduino = 0;
bool enviarIR = 1;
int IRcode = "0x542A";
int  TEMPERATURA = 0;
int  HUMETAT = 0;
bool ALUMNES = 0;
int pirStat = 0;
bool RELES = 0;
bool VENTILADORS = 0;
bool CAIXA_MAIN = 1;
bool CAIXA_PORTA = 0;
bool CAIXA_RELES = 1;
bool PROJECTOR = 0;
bool estat_llum = 0;
bool estat_ventiladors = 0;

//Variables que rebem
bool recived_llum = 0;
int recived_humetat = 0;
int recived_temperatura = 0;
bool recived_rele = 0;
bool recived_alumnes = 0; 
bool recived_ventiladors = 0;

// Variables per al codi 
bool isProjectorOn = false;
char t1_from_ESP[5];  //For time from web
char d1_from_ESP[2];  //For recived_llum
char d2_from_ESP[2];  //For recived_alumnes
char d3_from_ESP[2];  //For received_reles
char d4_from_ESP[2];  //For received_ventiladors
char d5_from_ESP[2];  //For received_bool_5
char d9_from_ESP[6];  //For received_temperatura_abp
char d10_from_ESP[6]; //For received_humitat_abp
char d11_from_ESP[6]; //For received_nr_3
char d12_from_ESP[6]; //For received_nr_4
char d13_from_ESP[6]; //For received_nr_5
char d14_from_ESP[300]; //For received_text 


//Paraules
const char keyword_OK[] = "OK";
const char keyword_Ready[] = "Ready";
const char keyword_no_change[] = "no change";
const char keyword_blank[] = "#&";
const char keyword_ip[] = "192.";
const char keyword_rn[] = "\r\n";
const char keyword_quote[] = "\"";
const char keyword_carrot[] = ">";
const char keyword_sendok[] = "SEND OK";
const char keyword_linkdisc[] = "Unlink";

const char keyword_t1[] = "t1";
const char keyword_b1[] = "b1";
const char keyword_b2[] = "b2";
const char keyword_b3[] = "b3";
const char keyword_b4[] = "b4";
const char keyword_b5[] = "b5";
const char keyword_n1[] = "n1";
const char keyword_n2[] = "n2";
const char keyword_n3[] = "n3";
const char keyword_n4[] = "n4";
const char keyword_n5[] = "n5";
const char keyword_n6[] = "n6";
const char keyword_doublehash[] = "##";


SoftwareSerial ESP8266(ESP8266_RX, ESP8266_TX);// rx tx

void setup(){
//Definim tipus de pins
  pinMode(ESP8266_RX, INPUT);
  pinMode(ESP8266_TX, OUTPUT);
  pinMode(LED1, OUTPUT);
  pinMode(Rele, OUTPUT);
  pinMode(PIR, INPUT);
  pinMode(24, OUTPUT); // SORTIDA
  pinMode(8, INPUT); // ENTRADA
    digitalWrite(24,LOW);

  digitalWrite(LED1,LOW);
  digitalWrite(Rele,LOW);
  ESP8266.begin(9600);
  ESP8266.listen();
  Serial.begin(9600); 
  setup_ESP();
  Serial.println("Comprovem LED");
  Serial.println("Comprovem RELE");
  Serial.println("Preparant IR ....");
  Serial.println("Comprovem ESP");
  //Definim les coneccions amb el arduino
   Wire.begin();
   Serial.println("Conecció amb arduino feta");
}
  
void loop(){
// Definim algunes funcions dels sensors
  pirStat = digitalRead(PIR);
  int chk = DHT11.read(DHT11PIN);
  TEMPERATURA = DHT11.temperature;
  HUMETAT = DHT11.humidity;
  Serial.println("Estat del projector = ");
  Serial.print(isProjectorOn);
  
// Combo 1
  // Sensor IR


//Enviem al servidor
//Server 1
  send_to_server_1(); 
if(recived_llum == 1){
  digitalWrite(24, HIGH);
  Serial.print("Envio a arduino llum oberta");
  }
  if(recived_llum == 0){
  digitalWrite(24, LOW);
  Serial.print("Envio a arduino llum tancada");
  }
if(digitalRead(8) == HIGH ){
  Serial.println("llum general oberta");
  llum_rebuda_arduino = 1;
  estat_llum = 1;
  }
  if(digitalRead(8) == LOW ){
  Serial.println("llum general tancada");
  llum_rebuda_arduino = 0;
  estat_llum = 0;
  }
  digitalWrite(LED1,recived_llum);
  digitalWrite(Rele,recived_rele);
    if(pirStat == HIGH){
    Serial.println("Alumnes detectats");
    ALUMNES = 1;
  }else{
      Serial.println("No detectem alumnes");
      ALUMNES = 0;
  }
//Prova ventiladorsv
   if(estat_ventiladors == 1){
        Serial.println("Ventiladors Engegats");
        sender.sendNEC(0x87D57E46, 32);
   }else{
        Serial.println("Ventiladors Apagats");
        sender.sendNEC(0x8A8F5F86, 32);
   }
   if(recived_rele == 1){
      Serial.println("Projector Engegats ");
       sender.sendSony(IRcode, 15);
   }else{
      Serial.println("Projector Apagats");
      sender.sendSony(IRcode, 15);
      }
    delay(3000);
 // Server 2
  send_to_server_2(); 
if(recived_llum == 1){
  digitalWrite(24, HIGH);
  Serial.print("Envio a arduino llum oberta");
  }else{
      digitalWrite(24, LOW);

    }
if(digitalRead(8) == HIGH ){
  Serial.println("llum general oberta");
  }
  digitalWrite(LED1,recived_llum);
  digitalWrite(Rele,recived_rele);
    if(pirStat == HIGH){
    Serial.println("Alumnes detectats");
    ALUMNES = 1;
  }else{
      Serial.println("No detectem alumnes");
      ALUMNES = 0;
  }
   if(recived_ventiladors == 1){
        Serial.println("Ventiladors Engegats");
        sender.sendNEC(0x87D57E46, 32);
   }else{
        Serial.println("Ventiladors Apagats");
        sender.sendNEC(0x8A8F5F86, 32);
   }
   if(recived_rele == 1){
      Serial.println("Projector Engegats ");
       sender.sendSony(IRcode, 15);
   }else{
      Serial.println("Projector Apagats");
      sender.sendSony(IRcode, 15);
      }
    delay(3000);
//Server 3
  send_to_server_3(); 
if(recived_llum == 1){
  digitalWrite(24, HIGH);
  Serial.print("Envio a arduino llum oberta");
  }
  if(recived_llum == 0){
  digitalWrite(24, LOW);
  Serial.print("Envio a arduino llum tancada");
  }
if(digitalRead(8) == HIGH ){
  Serial.println("llum general oberta");
  llum_rebuda_arduino = 1;
  estat_llum = 1;
  }
  if(digitalRead(8) == LOW ){
  Serial.println("llum general tancada");
  llum_rebuda_arduino = 0;
  estat_llum = 0;
  }
    if(pirStat == HIGH){
    Serial.println("Alumnes detectats");
    ALUMNES = 1;
  }else{
      Serial.println("No detectem alumnes");
      ALUMNES = 0;
  }
   if(recived_ventiladors == 1){
        Serial.println("Ventiladors Engegats");
        sender.sendNEC(0x87D57E46, 32);
   }else{
        Serial.println("Ventiladors Apagats");
        sender.sendNEC(0x8A8F5F86, 32);
   }
   if(recived_rele == 1){
      Serial.println("Projector Engegats ");
       sender.sendSony(IRcode, 15);
   }else{
      Serial.println("Projector Apagats");
      sender.sendSony(IRcode, 15);
      }
    delay(3000); 
//Server 3 
  send_to_server_4(); 
if(recived_llum == 1){
  digitalWrite(24, HIGH);
  Serial.print("Envio a arduino llum oberta");
  }
  if(recived_llum == 0){
  digitalWrite(24, LOW);
  Serial.print("Envio a arduino llum tancada");
  }
if(digitalRead(8) == HIGH ){
  Serial.println("llum general oberta");
  llum_rebuda_arduino = 1;
  estat_llum = 1;
  }
  if(digitalRead(8) == LOW ){
  Serial.println("llum general tancada");
  llum_rebuda_arduino = 0;
  estat_llum = 0;
  }
  digitalWrite(LED1,recived_llum);
  digitalWrite(Rele,recived_rele);
    if(pirStat == HIGH){
    Serial.println("Alumnes detectats");
    ALUMNES = 1;
  }else{
      Serial.println("No detectem alumnes");
      ALUMNES = 0;
  }
   if(recived_ventiladors == 1){
        Serial.println("Ventiladors Engegats");
        sender.sendNEC(0x87D57E46, 32);
   }else{
        Serial.println("Ventiladors Apagats");
        sender.sendNEC(0x8A8F5F86, 32);
   }
   if(recived_rele == 1){
      Serial.println("Projector Engegats ");
       sender.sendSony(IRcode, 15);
   }else{
      Serial.println("Projector Apagats");
      sender.sendSony(IRcode, 15);
      }
    delay(3000);
}
// Afegir el led verd que indica que la caixa funciona
// Que el ventilador sol envii un sol cop
