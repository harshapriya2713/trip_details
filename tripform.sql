CREATE TABLE trip_details (
    id SERIAL PRIMARY KEY,
    Full_Name VARCHAR(255),
    Phone_Number VARCHAR(15),
    Email VARCHAR(255),
    Destination VARCHAR(255),
    Mode_Of_Travel VARCHAR(50),
    Count_Of_People INT,
    StartDate DATE,
    End_Date DATE,
    Purpose_Of_Trip VARCHAR(50),
    Mention_Other_Facilities TEXT
);
select * from trip_details;

select current_user;
drop table trip_details;

