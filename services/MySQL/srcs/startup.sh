#Initializes the database and creates the default tables, wordpress tables are used to categorize databases
#Root is the default user
mysql_install_db --user=root --ldata=/var/lib/mysql

#Creation of users.sql file with sql commands to create a database and users
cat > /tmp/users.sql << end
CREATE DATABASE wordpress;
CREATE USER 'user1'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'user1'@'%' IDENTIFIED BY 'password' WITH GRANT OPTION;
FLUSH PRIVILEGES;
end

telegraf &
/usr/bin/mysqld --init_file=/tmp/users.sql