pipeline {
    agent {
        label 'php-agent'
    }
    
    environment {
        PROJECT_NAME = 'simple-php-project'
    }
    
    stages {
        stage('Checkout') {
            steps {
                checkout scm
                echo 'Codul a fost extras cu succes'
            }
        }
        
        stage('Verify Environment') {
            steps {
                echo 'Verificarea mediul de execuție...'
                sh '''
                    echo "Working directory: $(pwd)"
                    echo "PHP version: $(php --version | head -1)"
                    echo "Project structure:"
                    find . -type f -name "*.php" | sort
                '''
            }
        }
        
        stage('Run Unit Tests') {
            steps {
                echo 'Rularea testelor unitare...'
                sh '''
                    echo "Running basic syntax check..."
                    find src tests -name "*.php" -exec php -l {} \\;
                    
                    echo "Running unit tests..."
                    php tests/run-all-tests.php
                '''
            }
        }
        
        stage('Code Analysis') {
            steps {
                echo 'Analizare cod...'
                sh '''
                    echo "Lines of PHP code:"
                    find src -name "*.php" -exec wc -l {} + | tail -1
                    
                    echo "Lines of test code:"
                    find tests -name "*.php" -exec wc -l {} + | tail -1
                    
                    echo "Code structure:"
                    echo "PHP Files: $(find . -name '*.php' | wc -l)"
                    echo "Total Lines: $(find . -name '*.php' -exec cat {} + | wc -l)"
                '''
            }
        }
    }
    
    post {
        always {
            echo '🏁 Pipeline finalizat pentru ${PROJECT_NAME}'
        }
        success {
            echo '🎉 SUCCES: Toate testele au trecut!'
        }
        failure {
            echo '💥 EROARE: Unele teste au eșuat!'
        }
    }
}
