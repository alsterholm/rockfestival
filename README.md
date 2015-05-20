# Blomstermåla Rockfestival

## Innehåll

* [Installation](#installation)
* [Projektbeskrivning](#projektbeskrivning)
* [Problembeskrivning](#problembeskrivning)
	* [Besökarkrav](#besökarkrav)
	* [Administratörskrav](#administratörskrav)
		* [Säkerhet](#säkerhet)
		* [Kontaktperson](#kontaktperson)
		* [Spelschema](#spelschema)
	* [Systemkrav](#systemkrav)
* [ER-diagram](#er-diagram)
* [Tabeller](#tabeller)
	* [anstalld](#anstalld)
	* [band](#band)
	* [bandmedlem](#bandmedlem)
	* [scen](#scen)
	* [sakerhetsansvar](#sakerhetsansvar)
	* [spelschema](#spelschema-1)
	* [genre](#genre)

---

## Installation 

För att installera Bootstrap och jQuery, kör:

    bower install


Om du inte har bower installerat, kör:

	npm install -g bower


Om du inte har npm, ladda ner och installera Node.js på http://www.nodejs.org

---

## Projektbeskrivning

Produkten som skall utvecklas är en webbapplikation som skall underlätta arbetet för Blomstermåla Rockfestivals kansli.

Webbapplikationen kommer att bestå av en webbsida där besökare till festivalen kan få upplysning om vilka band som spelar och ett spelschema för dagarna som festivalen pågår, samt även en administratörssida där kansliet kan lägga till band, spelningar och ha tillgång till övrig information som behövs. Detta kommer kompletteras med en databas som innehåller all information som behövs för de krav som finns uppställda senare i detta dokument.

Produktens syfte är att hjälpa till med administrationen av festivalen så att de ansvariga, på ett enkelt sätt, kan få fram den information de behöver samt lägga till ny information.


## Problembeskrivning

Här följer de krav vi satt upp för produkten ordnade efter om kraven gäller vanliga besökare eller någon med administratörsrättigheter samt även krav på systemet.

### Besökarkrav
* **B-1:**	Besökare bör ha tillgång till spelschema	
* **B-2:**	Besökare bör ha tillgång till information om band
* **B-3:**	Besökare bör ha tillgång till information om bandmedlemmar


### Administratörskrav
* **A-B-1:**	Administratörer skall kunna boka band	
* **A-B-2:**	Administratörer skall kunna utse kontaktpersoner till band	
* **A-B-3:**	Administratörer skall kunna boka spelningar till band
* **A-B-4:**	Administratörer skall kunna lägga till information om bandmedlemmar
* **A-B-5:**	Administratörer skall kunna lista information om banden


#### Säkerhet
* **A-S-1:**	Administratörer skall kunna utse säkerhetsansvarig för scen
* **A-S-2:**	Administratörer skall kunna lista alla säkerhetsansvariga, med info om scen, tid och personnummer på ansvarig 


#### Kontaktperson
* **A-K-1:**	Administratörer skall kunna lista alla kontaktpersoner för ett specifikt band
* **A-K-2:**	Administratörer skall kunna lista över alla bands kontaktpersoner
* **A-K-3:**	Administratörer skall kunna lista alla kontaktpersoner samt hur många bandmedlemmar de har ansvar för.


#### Spelschema
* **A-SS-1:**	Administratörer skall kunna lista spelschema för en specifik scen
* **A-SS-2:**	Administratörer skall kunna lista spelschema för alla scener


### Systemkrav
* **S-1:** 		Systemet skall hindra felaktig inmatning av data genom användning av menyval där detta är möjligt.



## ER-diagram

![ER-diagram](https://camo.githubusercontent.com/79645e9aab2468b443efe7b81748b4d7b1b217ba/687474703a2f2f726f636b6574736869702e73652f31313239343336305f31303135333839313837333136343039375f3134333636343637305f6f2e6a7067)



## Tabeller

### **anstalld**
_id_, namn, persnr


### **band**

_id_, namn, land, genre, kontaktperson

FK genre(namn), FK anstalld(id)


### **bandmedlem**

_id_, namn, fdatum, band_id

FK band(id)


### **scen**

_id_, namn, kapacitet


### **sakerhetsansvar**

_id_, anstalld\_id, scen_id, startid, sluttid

FK anställd(id), FK scen(id)


### **spelschema**

_id_, band\_id, scen_id, startid, sluttid

FK band(id), FK scen(id)


### **genre**

_namn_


