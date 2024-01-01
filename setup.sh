rm -rf .git
rm -rf .gitattributes
git init
git add .
read -p " Enter PANToken:" token
read -p " Enter Git Repo of new project:" url
domain="${url#https://}"
repo="https://${token}@${domain}"
echo "origin will be set to $repo"
git remote add origin "$repo"
read -p "primary branch name (main/master):" branch
git branch -M $branch
read -p " Enter commit message: " commitmessage
git commit -m "$commitmessage"
git push -u origin $branch
