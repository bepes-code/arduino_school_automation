# Arduino School Automation

## Introduction
This is a project to automate various aspects of a school using Arduino boards and sensors. The system can control lighting, climate, and access to different parts of the school. [Video](https://youtu.be/adDOBgjB-vQ)

## Some information
This project starts at May 2022, when in Spain the 2n year students of "batxillerat" (the last grade before the university in Spain) had to make a TDR project (Research project), my tutor proposed me the idea of automating the classrooms of the institute to seek better efficiency. I and other 2 classmates accept that challenge, and we start working at this. And that's it, finally we can finish the project.

## About the project
The project consist in 2 parts, the web, in which you can control the classes, and the Arduino, the microprocessor who control and obey the orders and petitions of the web. This project is based in the classes, and we utilize 3 Arduino, one of this, control de access in the class, with a fingerprint detector and an intelligent knob, the second one, connect the light of the class into the Arduino and send the information with Bluetooth to the main Arduino, who has the sensors of temperature, humidity, and presence, that last one also have an IR sensor who can open on close the devices of the class. With a Wi-Fi module send the information in a SQL database and then, on the web, we can read and modify that information.

## Features
The following features are included in the system:

### Acces Control
1. Enter in the classes with a RFID Card or Digital Actilar, this feature can control the time that the teachers arribe and left the classes and when the acces is correct the light will be open automaticly.

### Light Control
2. In the App you can control de state of the light and see if there were on or off, when the acces control was true the light turn on automaticly, and if the movement detector don't detect students or teachers the light turns off.

### Climate Control
3. The climate management system will automatically control the temperature and humidity of the school. If it detects that the temperature or humidity is below certain thresholds, the fans and humidifier will be activated, respectively.

## Requerminets & Material

To develop this project you need:

### Main Case
1. x1 Arduino Mega 
2. x1 Humidity Sensor (DHT11)
3. x1 Motion Sensor (PIR)
4. x1 Green LED
5. x1 ESP-01
6. x1 IR Sender

### Door Case
1. x1 Arduino MEGA
2. x1 Fingerprint Dtector
3. x1 RFID Detector
4. x1 ESP-01
5. x1 Green LED
6. x1 Red LED
7. x1 Button
8. x1 Relé

### Reles Case
1. x1 Arduino UNO
2. Relé
3. Tuya Switch (Relé in case that the class don't have wifi switches)


## How to deploy the project
### Web  & Database (More information on the folder)
1. Firstly, you need a domain and a hosting with the possibility to update 2 databases. You can find one free [here](https://es.000webhost.com/)
2. Update the databases and the files
3. Upload the database credentials access in the file ...
4. Upload the web files in the hosting
### Arduino (More information on the folder)  
5. Mount the Arduino with the schemas (Next point)
6. Update the Wi-Fi credentials, and the web information
7. Upload the files in to the Arduino

## 3D Models
We published the 3D models for you, to bring you the oportunity to printed with a 3D Printer.

## Contact

If you have any questions or comments about the project, please feel free to get in touch with the development team through the following channels:

- Email: bepescode@gmail.com
- Twitter: @bepescode
- Discord: !Bepe$#6207

## Contributors

- RTREBLA
- Uriii

## Acknowledgments

We would like to thank the following people and organizations for their support and contribution to the project:

- [@electronoobs](www.electronoobs.com ), for the idea of the code who send the Arduino information to the database and the foots of the project.

## Images
### Arduino Schemas
[Main Case](https://i.imgur.com/s66XOd9.png)
[Door Case](https://i.imgur.com/qeP3qnB.png)
[Reles Case](https://i.imgur.com/9RJPrOv.png)

### Web Desgin
[Login Page](https://i.imgur.com/4vbCt9G.png)
[Main Page](https://i.imgur.com/gyB1VAU.png)
[Control Page](https://i.imgur.com/7ZjwdWE.png)
[Information Page](https://i.imgur.com/JDNcDUM.png)
[Sensors Page](https://i.imgur.com/gyB1VAU.png)

## Database
[Users Database](https://i.imgur.com/ZVt2A2Q.png)
[Clases Database](https://i.imgur.com/6KT67yo.png)


## Other information
- Finally a video to see how it works that project --> [video]()
- Project of [electronoobs](https://electronoobs.com/eng_arduino_tut101.php)
- Provably this project has some bugs that we don't have time to fix or not a good structure, if you have any suggest contact me. I leave this project finished. Thanks for read this.

## More information about the project.
- The [document](https://github.com/bepes-code/arduino_school_automation/blob/Master/Extra/Tdr%20per%20a%20github.pdf) about the project in **catalan** (maybe in a few time in english)

**<3**


**© Bepes-code 2022**

