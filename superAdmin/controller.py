import jwt
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

ALGORITHM = 'HS256'
SECRET = 'HWOEIRWIBAOABKAJD7903294692348'

s = smtplib.SMTP(host='smtp.gmail.com', port='587')
s.starttls()
s.login('servicedesk.transcend@gmail.com', 'Alupo.Agatha&Edmond@2019')


def gen_key(var):
    key = jwt.encode(var, SECRET, ALGORITHM)

    return (key)

def verify_key(var):
    try:
        status = jwt.decode(var, SECRET, ALGORITHM)
        print (status)
        return ('valid'), 200

    except Exception as error:
        print (error)
        return (error), 500


def send_mail(var):
    try:        
        msg = MIMEMultipart()
        message ="Copy and paste this key into the token prompt to access the Super Admin panel \n \n {}".format(var)

        msg['From']='Astute SuperUser'
        msg['To']='edmondmusiitwa@gmail.com'
        msg['Subject']='Super user Login request'

        msg.attach(MIMEText(message, 'plain'))
        s.send_message(msg)
        del msg
        return ('sent')

    except Exception as error:
        return ('error')