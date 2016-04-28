#!/usr/bin/env bash
eval "$(ssh-agent -s)"
chmod 600 .travis/deploy-key.pem
ssh-add .travis/deploy-key.pem
git fetch --unshallow
git remote add deploy ssh://root@imc.clowting.me:/root/imc-retourmanagement.git
git push deploy +master:refs/heads/master
exit