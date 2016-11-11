
use homestead 
-- the following statement is to echo the excuted statements 
select '<info_to_dispaly>' AS ' ';

CREATE TABLE EE_IDEN 
(
EE_ID INT(10) NOT NULL,    
EE_FIRST_NAME VARCHAR(30),	
EE_LAST_NAME VARCHAR(30),	
EE_MI VARCHAR(10),	
EE_SSN VARCHAR(9) NOT NULL,	
EE_CHANGE_IND VARCHAR(1), 
PRIMARY kEY(EE_ID)
);
--******************************

CREATE TABLE EE_ADDRESS
(
EE_ADDRESS_ID INT(10) NOT NULL,
ADDRESS_LINE1 VARCHAR(255),	
ADDRESS_LINE2 VARCHAR(255),	
ADDRESS_LINE3 VARCHAR(255),	
CITY VARCHAR(30),	
STATE_CODE VARCHAR(30),
ZIP_CODE VARCHAR(5), 
ADDRESS_TYPE VARCHAR(2),
EE_ADDRESS_ACTIVITY_DATE DATE, 
EE_ADDRESS_EFFECTIVE_DATE DATE, 
EE_ADDRESS_END_DATE DATE, 
EE_ADDRESS_STATUS_IND VARCHAR(1),
EE_ADDRESS_USER_ID INT(10) NOT NULL,
PRIMARY KEY (EE_ADDRESS_ID)
);
--******************************

CREATE TABLE EE_FACTS
(
EE_FACT_ID INT(10) NOT NULL,	
EE_CLASS VARCHAR(10)	NOT NULL, 
EE_BENE_CLASS VARCHAR(110) NOT NULL,
EE_STATUS VARCHAR(1) NOT NULL, 
EE_FACT_EFFECTIVE_DATE DATE NOT NULL, 
EE_FACT_HIRE_DATE DATE NOT NULL, 
EE_FACT_TERM_DATE DATE, 
PRIMARY KEY (EE_FACT_ID)
);
--******************************

--******************************
CREATE TABLE EE_CLASS
(
EE_CLASS_CODE VARCHAR(10) NOT NULL,
EE_CLASS_LONG_DESC VARCHAR(255) NOT NULL,7                                                                                                                                                                                                                                                                                                                                                                     
EE_CLASS_ACTIVITY_DATE DATE NOT NULL,
EE_CLASS_USER INT(10) NOT NULL, 
PRIMARY KEY (EE_CLASS_CODE)
);
--******************************
CREATE TABLE EE_HOURS 	
(
EE_HOURS_ID INT(10) NOT NULL, 
EE_HOURS_EVENT_ID INT(10) NOT NULL AUTO INCREMENT,
EE_HOURS_ACTIVITY_DATE DATE NOT NULL,
EE_HOURS_PAYNUM INT(3) NOT NULL,
EE_HOURS_STATUS_IND VARCHAR(1),
EE_HOURS_TIME_IN DATETIME,
EE_HOURS_TIME_OUT DATETIME,
PRIMARY KEY (EE_HOURS_ID, EE_HOURS_EVENT_ID)
);
--******************************




