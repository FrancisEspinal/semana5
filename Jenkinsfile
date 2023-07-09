pipeline {
  agent any

  stages {
    stage('jenkins') {
      steps {
        sh '''
          echo 1234 | sudo -S docker compose up -d --build
          ls
        '''
      }
    }
  }
  
}
