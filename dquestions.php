<?php

$GET_USER_BY_LOGIN='select * from mas_users where user_name=';
$ADD_THING="insert into dat_things(customer_id_fk,thing_name,description,isDisabled,created_on) values(";
$GET_ALL_THINGS="SELECT t1.id as tid,customer_id_fk,thing_name,description,isDisabled,created_on FROM dat_things t1, dat_customers t2 WHERE t2.id=t1.customer_id_fk AND customer_id_fk=";
$ADD_SERVICE="insert into dat_services(thing_id_fk,service_name,description,isenabled,created_on,transport_id_fk) values(";
$GET_SERVICES_FOR_THING="SELECT t2.thing_name,t2.description, t1.id as serid, t1.service_name,t1.description, t1.isenabled, t1.created_on, t2.created_on FROM dat_services t1, dat_things t2 WHERE t1.thing_id_fk=t2.id AND t2.id=";
$GET_DATA_TYPES="select id,type_name from mas_data_types";
$ADD_PROPS="insert into dat_properties(service_id_fk,prop_name,prop_type_fk,created_on,min_value,max_value) values(";
$GET_PROPS_FOR_SER="SELECT t1.id as pid,t1.prop_name, t2.type_name,t3.service_name,t4.thing_name,t1.created_on,t1.min_value,t1.max_value FROM dat_properties t1, mas_data_types t2, dat_services t3, dat_things t4 WHERE t1.prop_type_fk=t2.id AND t1.service_id_fk=t3.id AND t3.thing_id_fk=t4.id and t3.id=";
$DEL_PROP="delete from dat_properties where id=";
$GET_THING_BY_NAME="select t3.id as sid, t1.id,t1.thing_name,t1.description,t3.transport_id_fk from dat_things t1,mas_users t2,dat_services t3 where t3.thing_id_fk=t1.id AND t2.id=t1.customer_id_fk and t1.isDisabled=1 and t3.isEnabled=1 and t1.thing_name='";
$CHECK_PARAM_SER_RELATION="SELECT t1.id,t2.id as sid FROM dat_properties t1, dat_services t2 WHERE t1.service_id_fk=t2.id AND t1.prop_name in(";
$GET_PROP_ID="SELECT t1.id FROM dat_properties t1 WHERE t1.prop_name='";
$ADD_M2M_VALUES="insert into dat_m2m_data(prop_id_fk,prop_value,uploaded_on) values(";
$GET_SERVICES_FOR_USER="SELECT t2.thing_name,t2.description, t1.id as serid, t1.service_name,t1.description, t1.isenabled, t1.created_on, t2.created_on FROM dat_services t1, dat_things t2, mas_users t3 WHERE t3.id=t2.customer_id_fk and t1.thing_id_fk=t2.id";
$GET_M2M_DATA="SELECT t2.prop_name, t1.prop_value,t1.uploaded_on,t2.min_value,t2.max_value FROM dat_m2m_data t1, dat_properties t2, dat_services t3 WHERE t1.prop_id_fk=t2.id AND t2.service_id_fk=t3.id AND t2.id=";
$GET_ALL_TRANSPORTS="select id,transport_name from mas_transports";
?>