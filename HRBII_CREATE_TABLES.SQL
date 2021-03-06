
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
EE_CLASS VARCHAR(10) NOT NULL, 
EE_BENE_CLASS VARCHAR(110) NOT NULL,
EE_STATUS VARCHAR(1) NOT NULL, 
EE_FACT_EFFECTIVE_DATE DATE NOT NULL, 
EE_FACT_HIRE_DATE DATE NOT NULL, 
EE_FACT_TERM_DATE DATE, 
PRIMARY KEY (EE_FACT_ID)
);
--******************************
CREATE TABLE EE_CLASS
(
EE_CLASS_CODE VARCHAR(10) NOT NULL,
EE_CLASS_LONG_DESC VARCHAR(255) NOT NULL,                                                                                                                                                                                                                                                                                                                                                                     
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
EE_HOURS_TIME_IN TIMESTAMP,
EE_HOURS_TIME_OUT TIMESTAMP,
PRIMARY KEY (EE_HOURS_ID, EE_HOURS_EVENT_ID, EE_HOURS_ACTIVITY_DATE,EE_HOURS_PAYNUM)
);
--******************************
CREATE TABLE EE_PRIV
(
EE_PRIV_ID INT(10) NOT NULL,
PRIV_CODE INT(10) NOT NULL,
PRIV_
EE_PRIV_ACTIVITY_DATE DATE,
EE_PRIV_USER_ID INT(10),
EE_PRIV_END_DATE DATE,
PRIMARY KEY (EE_PRIV_E_ID,PRIV_CODE)
);
--*******************************
CREATE TABLE PRIV_VAL
(
PRIV_VAL_CODE INT(10) AUTO INCREMENT NOT NULL,
PRIV_VAL_DESC VARCHAR(255) NOT NULL,
PRIV_VAL_ACTIVITY_DATE DATE,
PRIV_VAL_USER_ID INT(10), 
PRIMARY KEY (PRIV_VAL_CODE)
);
--*******************************
CREATE TABLE EE_CLASS_VAL
(
CLASS_VAL_ID INT(10) NOT NULL AUTO INCREMENT,
CLASS_VAL_DESC VARCHAR(255) NOT NULL,
CLASS_VAL_ACTIVITY_DATE DATE NOT NULL,
CLASS_VAL_USER_ID INT(10) NOT NULL,
PRIMARY KEY (CLASS_VAL_ID)
);
--*******************************
CREATE TABLE BENE_CLASS_VAL 
(
BENE_CLASS_VAL_ID INT(10),
BENE_CLASS_DESC VARCHAR(255),
BENE_CLASS_ALLOWANCE VARCHAR(255),
BENE_ACCRUAL_INTERVAL INT(4),
PRIMARY KEY (BENE_CLASS_VAL_ID)
);
--*******************************
CREATE TABLE EE_BENE 
(
EE_BENE_ID INT(10) NOT NULL AUTO INCREMENT,
EE_BENE_BENE_CODE INT(10) NOT NULL,
EE_BENE_BEGIN_DATE DATE,
EE_BENE_EFFECTIVE_DATE DATE,
EE_BENE_ACTIVITY_DATE DATE,
EE_BENE_USER_ID INT(10), 
PRIMARY KEY (EE_BENE_ID,EE_BENE_BENE_CODE)
);
--*******************************
 CREATE TABLE EE_LEAVE
 (
 EE_LEAVE_ID INT(10),
 EE_LEAVE_CODE INT(10),
 EE_LEAVE_BEGIN_BALANCE FLOAT(5,2),
 EE_LEAVE_END_BALANCE FLOAT(5,2),
 EE_LEAVE_ACCRUED FLOAT(5,2),
 EE_LEAVE_EFFECTIVE_DATE DATE,
 EE_LEAVE_ACTIIVTY_DATE DATE,
 PRIMARY KEY (EE_LEAVE_ID, EE_LEAVE_CODE)
 );
 --*******************************
CREATE TABLE LEAVE_VAL
(
LEAVE_VAL_CODE INT(10) NOT NULL AUTO INCREMENT,
LEAVE_VAL_DESC VARCHAR(255),
LEAVE_VAL_ACTIVITY_DATE DATE,
PRIMARY KEY (LEAVE_VAL_CODE)
);
 --*******************************
CREATE TABLE BENE_VAL
(
BENE_VAL_CODE INT(10),
BENE_VAL_DESC VARCHAR(255),
BENE_VAL_ACTIVITY_DATE DATE,
BENE_VAL_USER_ID INT(10),
PRIMARY KEY (BENE_VAL_CODE)
);
--************************************
CREATE TABLE EE_DEDN 
(
EE_DEDN_ID INT(10) NOT NULL,
EE_DEDN_CODE INT(10) NOT NULL,
EE_DEDN_DATE DATE NOT NULL,
EE_DEDN_PAYNO INT(3) NOT NULL,
EE_DEDN_YEAR VARCHAR(4) NOT NULL,
EE_ACTIVITY_DATE DATE NOT NULL,
EE_DEDN_USER_ID INT(10) NOT NULL,
PRIMARY KEY (EE_DEDN_ID, EE_DEDN_CODE)
);
--************************************
CREATE TABLE DEDN_VAL 
(
DEDN_VAL_CODE INT(10) NOT NULL AUTO INCREMENT,
DEDN_VAL_DESC VARCHAR(255) NOT NULL, 
DEDN_VAL_ACTIVITY_DATE DATE, 
DEDN_VAL_ACTIVE_IND VARCHAR(1) NOT NULL, 
DEDN_VAL_USER_ID INT(10),
PRIMARY KEY (DEDN_VAL_CODE)
);
--************************************
CREATE TABLE EE_EARNING 
(
EE_EARNING_ID INT(10) NOT NULL AUTO INCREMENT,
EE_EARNING_CODE INT(10),
EE_EARNING_DATE DATE,
EE_EARNING_PAYNO INT(3),
EE_EARNING_YEAR VARCHAR(4),
EE_EARNING_ACTIVITY_DATE DATE,
EE_EARNING_USER_ID INT(10),
PRIMARY KEY (EE_EARNING_ID,EE_EARNING_CODE)
);
--************************************
CREATE TABLE EARN_VAL 
(
EARN_VAL_CODE INT (10) NOT NULL AUTO INCREMENT,
EARN_VAL_DESC VARCHAR(255) NOT NULL,
EARN_VAL_ACTIVITY_DATE DATE NOT NULL,
PRIMARY KEY (EARN_VAL_CODE)
);
--************************************
CREATE TABLE POSN_VAL 
(
POSN_VAL_CODE INT(10) NOT NULL AUTO INCREMENT,
POSN_VAL_DESC VARCHAR(255),
POSN_VAL_ACTIVITY_DATE DATE,
POSN_VAL_POSN_BUDGET FLOAT(10,2),
PRIMARY KEY (POSN_VAL_CODE)
);
--************************************
CREATE TABLE  JOB_VAL 
(
JOB_VAL_CODE INT(10) NOT NULL AUTO INCREMENT,
JOB_VAL_DESC VARCHAR(255) NOT NULL,
JOB_VAL_ACTIVITY_DATE DATE, 
JOB_VAL_USER_ID INT(10),
PRIMARY KEY (JOB_VAL_CODE)
);
--************************************
CREATE TABLE EE_COMPLIANCE 
(
EE_COMPLIANCE_ID INT(10) NOT NULL,
EE_COMPLIANCE_CODE INT(10) NOT NULL, 
EE_COMPLIANCE_ACTICITY_DATE DATE NOT NULL,
EE_COMPLIANCE_SCORE FLOAT(5,2) NOT NULL, 
EE_COMPLIANCE_END_DATE DATE NOT NULL, 
EE_COMPLIANCE_USER_ID INT(10),
PRIMARY KEY (EE_COMPLIANCE_ID , EE_COMPLIANCE_CODE)
);
--************************************
CREATE TABLE COMPLAINCE_VAL 
(
COMPLIANCE_VAL_CODE INT(10) NOT NULL AUTO INCREMENT, 
COMPLIANCE_VAL_DESC VARCHAR(255) NOT NULL, 
COMPLIANCE_VAL_END_DATE DATE,
COMPLIANCE_VAL_ACTIVITY_DATE DATE,
COMPLIANCE_VAL_IND VARCHAR(1),
COMPLIANCE_VAL_VAL INT(10),
PRIMARY KEY (COMPLIANCE_VAL_CODE)
);
--************************************
