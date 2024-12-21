pipeline {
    agent any
    environment {
        // Variabel lingkungan untuk koneksi MySQL
        MYSQL_HOST = 'db' // Disesuaikan dengan Docker Compose
        MYSQL_USER = 'root'
        MYSQL_PASSWORD = 'samijaya'
        MYSQL_DB = 'data_master'
    }
    stages {
        stage('Checkout dari Git') {
            steps {
                git branch: 'main', url: 'https://github.com/yourusername/your-repo.git'
            }
        }
        stage('Ambil Image dari Dockerhub') {
            steps {
                script {
                    def images = ['mysql:5.7', 'nginx:alpine', 'phpmyadmin/phpmyadmin', 'samijaya']
                    images.each { image ->
                        echo "Pulling image: ${image}"
                        docker.image(image).pull()
                    }
                    echo 'Berhasil mengambil semua image dari Dockerhub.'
                }
            }
        }
        stage('Jalankan MySQL') {
            steps {
                script {
                    // Jalankan container MySQL
                    def mysql = docker.image('mysql:5.7')
                    def mysqlContainer = mysql.run('-e MYSQL_ROOT_PASSWORD=samijaya -e MYSQL_DATABASE=${MYSQL_DB} -e MYSQL_USER=${MYSQL_USER} -e MYSQL_PASSWORD=${MYSQL_PASSWORD} -p 20222:3306 -d --name dbsamijaya')
                    echo 'Container MySQL sedang berjalan...'

                    // Tunggu MySQL siap
                    echo 'Menunggu MySQL siap...'
                    sleep(20) // Tunggu 20 detik agar MySQL siap
                }
            }
        }
        stage('Jalankan phpMyAdmin') {
            steps {
                script {
                    // Jalankan container phpMyAdmin
                    def phpMyAdmin = docker.image('phpmyadmin/phpmyadmin')
                    def phpMyAdminContainer = phpMyAdmin.run("-e PMA_HOST=${MYSQL_HOST} -e PMA_USER=${MYSQL_USER} -e PMA_PASSWORD=${MYSQL_PASSWORD} -p 7000:80 -d --name pmasamijaya")
                    echo 'Container phpMyAdmin sedang berjalan...'
                }
            }
        }
        stage('Jalankan Website') {
            steps {
                script {
                    // Jalankan container untuk aplikasi website
                    def website = docker.image('samijaya')
                    def websiteContainer = website.run("-e DB_CONNECTION=mysql -e DB_HOST=${MYSQL_HOST} -e DB_PORT=3306 -e DB_DATABASE=${MYSQL_DB} -e DB_USERNAME=${MYSQL_USER} -e DB_PASSWORD=${MYSQL_PASSWORD} -p 2022:80 -v ./storage/php.ini:/usr/local/etc/php/conf.d/local.ini -v .:/var/www/samijaya -d --name samijaya")
                    echo 'Container aplikasi website sedang berjalan...'
                }
            }
        }
        stage('Jalankan Nginx') {
            steps {
                script {
                    // Jalankan container untuk Nginx
                    def nginx = docker.image('nginx:alpine')
                    def nginxContainer = nginx.run("-p 80:80 -v .:/var/www/samijaya -v ./storage/:/etc/nginx/conf.d/ -d --name nginxsamijaya")
                    echo 'Container Nginx sedang berjalan...'
                }
            }
        }
    }
}
