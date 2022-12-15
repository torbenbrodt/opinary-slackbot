deploy:
	export $(cat .env | xargs)
	lftp -u ${FTP_USERNAME},${FTP_PASSWORD} ${FTP_HOST} -e "mirror -e -R -x .git -x README.md -x tests/ -x logs/ -x usage/ -x vendor/bin/ -p ./ ; exit"
