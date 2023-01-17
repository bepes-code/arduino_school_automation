boolean read_until_ESP(const char keyword1[], int key_size, int timeout_val, byte mode){
  timeout_start_val=millis();
  char data_in[20];
  int scratch_length=1;
  key_size--;
 
 //FILL UP THE BUFFER
 for(byte i=0; i<key_size; i++){//we only need a buffer as long as the keyword
  
            //timing control
            while(!ESP8266.available()){//wait until a new byte is sent down from the ESP - good way to keep in lock-step with the serial port
              if((millis()-timeout_start_val)>timeout_val){//if nothing happens within the timeout period, get out of here
                Serial.println(F("timeout 1"));
                return 0;//this will end the function
              }//timeout
            }// while !avail
  
    data_in[i]=ESP8266.read();// save the byte to the buffer 'data_in[]
    //Serial.write(data_in[i]);
    if(mode==1){//this will save all of the data to the scratch_data_from
      scratch_data_from_ESP[scratch_length]=data_in[i];//starts at 1
      scratch_data_from_ESP[0]=scratch_length;// [0] is used to hold the length of the array
      scratch_length++;//increment the length
    }//mode 1
    
  }//for i
  
//THE BUFFER IS FULL, SO START ROLLING NEW DATA IN AND OLD DATA OUT
  while(1){//stay in here until the keyword found or a timeout occurs

     //run through the entire buffer and look for the keyword
     //this check is here, just in case the first thing out of the ESP was the keyword, meaning the buffer was actually filled with the keyword
     for(byte i=0; i<key_size; i++){
       if(keyword1[i]!=data_in[i])//if it doesn't match, break out of the search now
       break;//get outta here
       if(i==(key_size-1)){//we got all the way through the keyword without breaking, must be a match!
       return 1; //return a 1 and get outta here!
       }//if
     }//for byte i
     

    //start rolling the buffer
    for(byte i=0; i<(key_size-1); i++){// keysize-1 because everthing is shifted over - see next line
      data_in[i]=data_in[i+1];// so the data at 0 becomes the data at 1, and so on.... the last value is where we'll put the new data
  }//for
 
         
           //timing control
            while(!ESP8266.available()){// same thing as done in the buffer
              if((millis()-timeout_start_val)>timeout_val){
                Serial.println(F("timeout 2"));
                return 0;
              }//timeout
            }// while !avail
    
   
   
    data_in[key_size-1]=ESP8266.read();//save the new data in the last position in the buffer

    

    
      if(mode==1){
      scratch_data_from_ESP[scratch_length]=data_in[key_size-1];
      scratch_data_from_ESP[0]=scratch_length;
      scratch_length++;


    }

    
    
  }

  
  
  
}
