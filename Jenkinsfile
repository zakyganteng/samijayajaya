pipeline {
    agent any
    environment {
        MYSQL_HOST = 'db'
        MYSQL_USER = 'root'
        MYSQL_PASSWORD = 'samijaya'
        MYSQL_DB = 'data_master'
    }
    stages {
        stage('Checkout dari Git') {
            steps {
                git branch: 'master', url: 'https://github.com/zakyganteng/samijayajaya.git'
            }
        }
        stage('Pull Docker Images') {
            steps {
                sh '''
                docker pull mysql:5.7
                docker pull nginx:alpine
                docker pull phpmyadmin/phpmyadmin
                docker pull samijaya
                '''
            }
        }
        stage('Run MySQL') {
            steps {
                sh '''
                docker run -d --name dbsamijaya \
                -e MYSQL_ROOT_PASSWORD=samijaya \
                -e MYSQL_DATABASE=data_master \
                -e MYSQL_USER=root \
                -e MYSQL_PASSWORD=samijaya \
                -p 20222:3306 \
                mysql:5.7
                '''
            }
        }
        stage('Run phpMyAdmin') {
            steps {
                sh '''
                docker run -d --name pmasamijaya \
                -e PMA_HOST=db \
                -e PMA_USER=root \
                -e PMA_PASSWORD=samijaya \
                -p 7000:80 \
                phpmyadmin/phpmyadmin
                '''
            }
        }
        stage('Run Website') {
            steps {
                sh '''
                docker run -d --name samijaya \
                -e DB_CONNECTION=mysql \
                -e DB_HOST=db \
                -e DB_PORT=3306 \
                -e DB_DATABASE=data_master \
                -e DB_USERNAME=root \
                -e DB_PASSWORD=samijaya \
                -p 2022:80 \
                -v ./storage/php.ini:/usr/local/etc/php/conf.d/local.ini \
                -v .:/var/www/samijaya \
                samijaya
                '''
            }
        }
        stage('Run Nginx') {
            steps {
                sh '''
                docker run -d --name nginxsamijaya \
                -p 80:80 \
                -v .:/var/www/samijaya \
                -v ./storage/:/etc/nginx/conf.d/ \
                nginx:alpine
                '''
            }
        }
    }
    post {
        success {
            echo 'Pipeline berhasil dijalankan!'
        }
        failure {
            echo 'Pipeline gagal dijalankan!'
        }
    }
}
