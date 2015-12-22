sql="delete from user_tmp where insert_date < now() - interval 1 day";
mysql -uroot -ppWlt4nyX6 --database=casino -e "${sql}"
