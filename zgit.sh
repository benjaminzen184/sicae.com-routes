echo "whats message to commited: "
read message

git add . && git commit -m "$message"
git push

echo "Commit Successful !"