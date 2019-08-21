from flask import Flask
from flask_restful import Api, Resource
from models import SuperHome, Login

app = Flask(__name__)
api = Api(app)

api.add_resource(SuperHome, '/check/<string:mac>/<string:ip>')
api.add_resource(Login, '/login-auth/<string:token>')

if __name__ == '__main__':
    app.run(debug=True, port='2011')
