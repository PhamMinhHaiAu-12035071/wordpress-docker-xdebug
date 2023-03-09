#!/bin/bash

sftp -i ~/Downloads/sshkey_without sftpuser@13.213.50.134 <<EOF
put auto_deploy.sh
exit
EOF
