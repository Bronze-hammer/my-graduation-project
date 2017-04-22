CREATE TABLE userinfo
(
	id INT NOT null AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(30),
   password VARCHAR(30)
);


CREATE TABLE upload_file_info
(
    id INT NOT null AUTO_INCREMENT PRIMARY KEY,
    identification VARCHAR(50),
    filename VARCHAR(30),
    filetype VARCHAR(20),
    file_tmp_name VARCHAR(30),
    filesize VARCHAR(30),
    fileabstract VARCHAR(500),
    file_upload_time VARCHAR(30)
);
