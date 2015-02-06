task :build do
  sh "rm -rf ./build/*"
  sh "cp ./source/.htaccess ./build"
  sh "cp ./source/index.php ./build"
  sh "cp -a ./source/theme ./build"
  sh "cp -a ./source/user_directory ./build; mv ./build/user_directory ./build/user1"
  sh "cp -a ./source/user_directory ./build; mv ./build/user_directory ./build/user2"
  sh "cp -a ./source/user_directory ./build; mv ./build/user_directory ./build/user3"
  sh "cp -a ./source/theme/images/demo/* ./build/user1"
  sh "cp -a ./source/theme/images/demo/* ./build/user2"
  sh "cp -a ./source/theme/images/demo/* ./build/user3"
  puts "DONE!"
end

task :default => 'build'