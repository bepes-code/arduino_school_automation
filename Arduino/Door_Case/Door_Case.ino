int temps = 3000; // temps en tancar la porta
#define Green 3
#define Red 2
#define RELE 6
#define Boto 4

bool Door 
// Door = 1 començe la secuencia d'obrir void correcte();
////////////////////////////////////////////////////////////////////////////////////////////////RFID////////////////////////
#include <SPI.h>      
#include <MFRC522.h>      

#define RST_PIN  5      
#define SS_PIN  53      

MFRC522 mfrc522(SS_PIN, RST_PIN); 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// RFID USERS
byte LecturaUID[4];      
byte Usuario1[4]= {0x5A, 0x54, 0x3B, 0x16} ;    
byte Usuario2[4]= {0x06, 0x76, 0x25, 0xD9} ;   

//5A 54 3B 16
boolean comparaUID(byte lectura[],byte usuario[]) 
{
  for (byte i=0; i < mfrc522.uid.size; i++){    
  if(lectura[i] != usuario[i])        
    return(false);          
  }
  return(true);           
}
///////////////////////////////////////////////////////////////////////////////////////////////////////empreta////////////////

#include <Adafruit_Fingerprint.h>
#include <SoftwareSerial.h>
#include <Arduino.h>
#ifdef U8X8_HAVE_HW_SPI
#include <SPI.h>
#endif
#ifdef U8X8_HAVE_HW_I2C
#include <Wire.h>
#endif
SoftwareSerial mySerial(10, 11);
Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);
int pin8 = 8;
int pin12 = 12;
int estado = 0;
String numID;

///////////////////////////////////////////////////////////////// FINGER INT

int datosFingerprint() {
  uint8_t p = finger.getImage();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.image2Tz();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.fingerFastSearch();
  if (p != FINGERPRINT_OK)  return -1;

  Serial.print("ID #"); Serial.print(finger.fingerID); 
  Serial.print(" certeça del: "); Serial.println(finger.confidence);


numID = String(finger.fingerID); 

correcte();
  return finger.fingerID; 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////correcte/////////////////////

void correcte()
{
  Serial.println("oberta la porta");
  digitalWrite(Green, HIGH);
  digitalWrite(RELE, HIGH);
  delay(temps);
   digitalWrite(Red, HIGH);
  digitalWrite(RELE, LOW);
  digitalWrite(Green, LOW);
  delay(1000);
  digitalWrite(Red, LOW);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////VOID SETUP/////////VOID SETUP/////////VOID SETUP/////////VOID SETUP/////////VOID SETUP/////////VOID SETUP/////////VOID SETUP/////////VOID SETUP/////////VOID SETUP/////////VOID SETUP/////////VOID SETUP
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

void setup() {
  Serial.begin(9600);     
  SPI.begin();        
  mfrc522.PCD_Init();     
  Serial.println("Listo");    
  
  Serial.println("Inicio detección del módulo fingerprint");

  finger.begin(57600);

  if (finger.verifyPassword()) {
    Serial.println("Sensor d'empremtes reconegut");
  } else {
    Serial.println("Error en la conexio del sensor d'empremta :(");
    while (1);
  }
  Serial.println("Esperant empremta valida...");

  pinMode(Green, OUTPUT);
  pinMode(Red, OUTPUT);
  pinMode(RELE, OUTPUT);
  pinMode(Boto, INPUT);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////VOID LOOP////////VOID LOOP////////VOID LOOP////////VOID LOOP////////VOID LOOP////////VOID LOOP////////VOID LOOP////////VOID LOOP////////VOID LOOP////////VOID LOOP////////VOID LOOP////////VOID LOOP///////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
void loop() {
  datosFingerprint();
  delay(50);
  if (digitalRead(Boto) == LOW)
  correcte();
  if (Door == 1)
  correcte();
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////// RFID//////////////////////////////////////
  if ( ! mfrc522.PICC_IsNewCardPresent())   
    return;           
  
  if ( ! mfrc522.PICC_ReadCardSerial())     
    return;           
    
    Serial.print("UID:");       
    for (byte i = 0; i < mfrc522.uid.size; i++) { 
      if (mfrc522.uid.uidByte[i] < 0x10){   
        Serial.print(" 0");       
        }
        else{           
          Serial.print(" ");        
          }
          Serial.print(mfrc522.uid.uidByte[i], HEX);    
          LecturaUID[i]=mfrc522.uid.uidByte[i];          
          }
          
          Serial.print("\t");                     
                    
          if(comparaUID(LecturaUID, Usuario1)){    
            Serial.println("Bienvenido Albert"); 
            correcte();
          }
          else if(comparaUID(LecturaUID, Usuario2)) {
            Serial.println("Bienvenido Usuario 2"); 
            correcte();
            }
           else           
            Serial.println("No reconegut");              
                  
                  mfrc522.PICC_HaltA();                  
}
