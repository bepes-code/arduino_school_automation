////////////// ARDUINO RELES /////////
  bool estat_llum_general = 0; // LLUM APP MOVIL
  bool estat_llum_rele = 0; // LLUM GENERAL
  bool estat_llum_server = 0; // LLUM SERVER
  bool estat = LOW;
  int isOn = 0;
  int isOff= 2;


    
void setup(){ 
  Serial.begin(9600);
  pinMode(5, INPUT);// ENTRADA INFO MOBIL
  pinMode(3, OUTPUT); // SORTIDA CAP AL RELE
  pinMode(11, INPUT);// ENTRADA INFO SERVER
  pinMode(12, OUTPUT); // SORTIDA INFO LLUM GENRAL

  
}
void loop(){ 
  //ENTRADA INFO SERVER
 if(digitalRead(11) == HIGH){
    Serial.println("LIGHT SERVER ON");
    estat_llum_server = 1;
          ++isOn;
          isOff = 2;
                Serial.println(isOff);

      if(isOn == 1){
            estat = !estat;
      }
      Serial.println(isOn);
  }else{
      Serial.println("LIGHT SERVER OFF");
      estat_llum_server = 0;
    }
    if(digitalRead(11) == LOW){
      isOn = 0;
      if(isOn == 0){
              --isOff;
              if (isOff == 1){
                            estat = !estat;
              }

      }
      --isOff;
      Serial.println(isOff);
    }

      //ENTRADA INFO APP
  if(digitalRead(5) == LOW){
  Serial.println("INTERNET RELE OFF");
  estat_llum_general = 0;
      digitalWrite(12, LOW);

  }
  if(digitalRead(5) == HIGH){
  Serial.println("INTERNET RELE ON");
  estat_llum_general = 1;
    digitalWrite(12, HIGH);
  }

if(estat_llum_server == 1){
  Serial.print("ENGEGAT");
}
  digitalWrite(3, estat);

      Serial.println(isOn);

delay(1000);
  }
