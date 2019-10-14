for OPT in "$@"
do
    case $OPT in
        '-nocache' )
            FLAG_NO_CACHE=1
            ;;
    esac
    shift
done

docker-compose stop
docker-compose rm -f
if [ "FLAG_NO_CACHE" ]; then
  docker-compose build --no-cache
else
  docker-compose build
fi
docker-compose up -d
docker-compose ps