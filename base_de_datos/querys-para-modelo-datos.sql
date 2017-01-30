/*TRUNCATE cne.rendi_urban_y_emisi_de;*/
describe cne.rendi_urban_y_emisi_de;

select * from cne.rendi_urban_y_emisi_de;

select DISTINCT RUE_SDESMARCA,RUE_SDESMODELO from cne.rendi_urban_y_emisi_de; /* Marca - Modelo */

select DISTINCT RUE_SDESNORMA from cne.rendi_urban_y_emisi_de; /*Norma*/

select DISTINCT RUE_SDESEMPRESAHOMO from cne.rendi_urban_y_emisi_de; /*Empresa Homologación*/

select DISTINCT RUE_SDESCATEGORIA from cne.rendi_urban_y_emisi_de; /*Categoría*/

select DISTINCT RUE_SDESCOMBUSTIBLE from cne.rendi_urban_y_emisi_de; /*Combustible*/

select DISTINCT RUE_SDESTRACCION from cne.rendi_urban_y_emisi_de; /*Trancción*/

select DISTINCT RUE_SDESCARROCERIA from cne.rendi_urban_y_emisi_de; /*Carrocería*/

select DISTINCT RUE_SDESTRANSMISION from cne.rendi_urban_y_emisi_de; /*Transmision*/


