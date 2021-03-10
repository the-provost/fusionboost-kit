rm -rf .git
rm -rf .gitattributes
git init  
git add .
git remote add origin https://github.com/greymore-tech/laravel-vue-scaffold.git
git branch -M main
read -p " Enter commit message: " commitmessage
git commit -m "$commitmessage"
git push -u origin main