CREATE TABLE gallery (
    gallery_id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL
    ,gallery_title LONGTEXT NOT NULL
    ,gallery_desc LONGTEXT NOT NULL
    ,gallery_img_name LONGTEXT NOT NULL
    ,gallery_order LONGTEXT NOT NULL
    ,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE adminTable (
    admin_id varchar(36) PRIMARY KEY NOT NULL
    ,admin_email LONGTEXT NOT NULL
    ,admin_password LONGTEXT NOT NULL
    ,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);