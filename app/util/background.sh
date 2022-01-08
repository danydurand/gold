DIAX_SEMA=`date '+%a'`
HORA_DIAX=`date '+%a'`
NOMB_ARCH="/var/www/html/newliberty/sql/"$DIAX_SEMA"_liberty.sql"
echo "Empieza" 
date 
echo "" 
mysqldump --user=root --password=hiroshima71 bsc > $NOMB_ARCH
rm -f $NOMB_ARCH.gz
gzip $NOMB_ARCH
echo "Termina" 
date 

