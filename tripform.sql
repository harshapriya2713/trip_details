CREATE TABLE trip_details (
    id SERIAL PRIMARY KEY,
    full_name VARCHAR(255),
    phone_number VARCHAR(15),
    email VARCHAR(255),
    destination VARCHAR(255),
    mode_of_travel VARCHAR(50),
    count_of_people INT,
    startdate DATE,
    end_date DATE,
    purpose_of_trip VARCHAR(50),
    mention_other_facilities TEXT
);
select * from trip_details;

select current_user;
drop table trip_details;

CREATE TABLE trip_people (
    id SERIAL PRIMARY KEY,
    full_name VARCHAR(255) 
    person_name VARCHAR(255)
);

CREATE TABLE trip_purpose (
    id SERIAL PRIMARY KEY,
    full_name VARCHAR(255)
    purpose_description TEXT 
);
