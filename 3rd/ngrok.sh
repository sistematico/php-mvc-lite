#!/bin/bash

cd /tmp

# download
wget https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-amd64.zip

# unzip
unzip ngrok-stable-linux-amd64.zip 

# move to /usr/local/bin
sudo mv ngrok /usr/local/bin

# create directory
sudo mkdir -p /opt/ngrok

# export authtoken
export TOKEN="$(cat ngrok.token)"

# create config file
echo "authtoken: $TOKEN" | sudo tee /opt/ngrok/ngrok.yml

# create systemd script
echo "[Unit]
Description=ngrok script
[Service]
ExecStart=/usr/local/bin/ngrok tcp --region=ap --config=/opt/ngrok/ngrok.yml 22
Restart=always
[Install]
WantedBy=multi-user.target" | sudo tee /etc/systemd/system/ngrok.service

# reload daemon
sudo systemctl daemon-reload

# enable service
sudo systemctl enable ngrok.service

# start service
sudo systemctl start ngrok.service