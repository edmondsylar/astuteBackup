from flask import request, jsonify
from flask_restful import Resource
from controller import gen_key, verify_key, send_mail

userAccress = {
    'ip-address':'192.168.8.1',
    'mac-address': '28-D2-44-60-EF-18'
}


class SuperHome(Resource):

    def post(self, ip, mac):
        payload = {
            'ip':ip,
            'mac':mac
        }
        key = gen_key(payload)
        status = send_mail(key.decode('utf-8'))
        # print (status)
        return (status)

        # return ("{} | {}".format(ip, mac))

class Login(Resource):
    def post(self, token):
        check = verify_key(token)
        print (check)
        return (check)