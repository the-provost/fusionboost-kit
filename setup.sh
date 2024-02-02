rm -rf .git
rm -rf .gitattributes
git init
git add .
read -p " Enter PAN Token:" token
read -p " Enter the Git Repo of new project:" url
domain="${url#https://}"
repo="https://${token}@${domain}"
echo "Git Origin will be set to $repo"
git remote add origin "$repo"
read -p "Primary branch name (main/master):" branch
git branch -M $branch
read -p " Enter the commit message: " commitmessage
git commit -m "$commitmessage"
git push -u origin $branch
