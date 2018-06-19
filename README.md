# 🚀 At Password Slack App
###### A Slack app to securely share passwords with your teammates.



## 🤔 What is it?
A simple self hosted Lumen app to securely share passwords with your teammates inside Slack. For more information please check the landings page here [atpassword.zandervdm.nl](https://atpassword.zandervdm.nl)

## 🏃 Running
*TODO: expand this to a full guide.*

To start with running your own bot you should do the following things:
- Checkout this repository and install Lumen. The installation guide can be found here: [lumen.laravel.com/docs/5.6/installation](https://lumen.laravel.com/docs/5.6/installation)
- Setup a MySQL database
- Copy the `.env.example` file to `.env` and fill in the MySQL details.
- Create a Slack app here: [api.slack.com/apps](https://api.slack.com/apps)
- Copy the `Verification token` to the `SLACK_COMMAND_VERIFICATION_TOKEN` inside the `.env` file.
- Create a Slash Command, name it whatever you want.
- Set the Request URL of the command to `https://this-app-domain.com/commands/password`

*Optionally*, you can choose to distribute this app (don't try to get it reviewed, Slack will deny it), OAuth support is already implemented.

## 🚨 Security

No audits done, code is open source so feel free to do it yourself. No guarantees in any way. 🤫

## 🗓 To-do
Please open issues if you want anything added. Its open source for a reason.
