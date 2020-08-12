#!/bin/bash
#
# Source: https://gist.github.com/ardyantohermawan/04f3f79b17399949e24e18c653595902

#if command -v unzip; then
#    echo "Needs unzip package!"
#    exit 1
#fi

# create directory
sudo mkdir -p /opt/ngrok

# export authtoken
export TOKEN=$(cat ngrok.token)

# create config file
#echo "authtoken: $TOKEN" | sudo tee /opt/ngrok/ngrok.yml

echo "authtoken: $TOKEN
tunnels:
  http:
    proto: http
    addr: 80
log: /opt/ngrok/ngrok.log" | sudo tee /opt/ngrok/ngrok.yml


# change to tmp folder
cd /tmp

# download & unzip
curl -s -L -O https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-amd64.zip && unzip ngrok-stable-linux-amd64.zip 

# move to /usr/local/bin
sudo mv ngrok /usr/local/bin

# create systemd script
echo "[Unit]
Description=ngrok script

[Service]
ExecStart=/usr/local/bin/ngrok start --all -log=/opt/ngrok/ngrok.log -config=/opt/ngrok/ngrok.yml
ExecStop=/usr/bin/killall ngrok
Restart=always

[Install]
WantedBy=multi-user.target" | sudo tee /etc/systemd/system/ngrok.service

# reload daemon
sudo systemctl daemon-reload

# enable service
sudo systemctl --now enable ngrok.service

# start service
sudo systemctl start ngrok.service