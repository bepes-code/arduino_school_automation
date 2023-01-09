# School automation project with arduino
## Introduction
This project starts at May 2022, when in Spain the 2n year students of "batxillerat" (the last grade before the university) had to make a TDR project (Research project), my tutor proposed me the idea of automating the classrooms of the institute to seek better efficiency. I and other 2 classmates accept that challenge, and we start working at this. And that's it, finally we can finish the project.
## About the project
The project consist in 2 parts, the web, in which you can control the classes, and the Arduino, the microprocessor who control and obey the orders and petitions of the web. This project is based in the classes, and we utilize 3 Arduino, one of this, control de access in the class, with a fingerprint detector and an intelligent knob, the second one, connect the light of the class into the Arduino and send the information with Bluetooth to the main Arduino, who has the sensors of temperature, humidity, and presence, that last one also have an IR sensor who can open on close the devices of the class. With a Wi-Fi module send the information in a SQL database and then, on the web, we can read and modify that information.
## How to deploy the project
Soon, YouTube video about how to deploy the project. 
Link [here](www.youtube.com)
### Web
1. Firstly, you need a domain and a hosting with the possibility to update 2 databases. You can find one free [here](https://es.000webhost.com/)
2. Update the databases and the files
3. Upload the database credentials access in the file ...
4. Upload the web files in the hosting
### Arduino   
5. Mount the Arduino with the schemas (Next point)
6. Update the Wi-Fi credentials, and the web information
7. Upload the files in to the Arduino
## Arduino Schemas
[Main Case]()
[Door Case]()
[Rele Case]()
## Web Design
[Main Case]()
[Door Case]()
[Rele Case]()
## Thanks
Thanks to:
- [@RTrebla]() to the development of the Arduino schemas and 3d models.
- [@Uriii14]() to help me with the Arduino communication and web design.
- Thanks to [electronoobs](www.electronoobs.com ), for the idea of the code who send the Arduino information to the database and the foots of the project.
## Other information
- Finally a video to see how it works that project --> [video]()
- Project of [electronoobs](https://electronoobs.com/eng_arduino_tut101.php)