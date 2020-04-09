from flask import Flask
from flask import request
from recombee_api_client.api_client import RecombeeClient
from recombee_api_client.exceptions import APIException
from recombee_api_client.api_requests import AddPurchase, RecommendItemsToUser, Batch , ResetDatabase
from time import sleep
import random

client = RecombeeClient('--my-database-id--', '--db-private-token--')
app = Flask(__name__)


@app.route('/', methods=["POST"])
def hello():
    data = request.get_json() 
    try:   
        recommended = client.send(RecommendItemsToUser(data['user'], 5)) 
        return recommended
    except: 
        return "Failed to Get Data"

@app.route("/reset", methods=['POST'])
def reset():
    purchase_requests = []
    data = request.get_json() 
    client.send(ResetDatabase())
    
    sleep(5)

    for d in data: 
        req = AddPurchase(d['user_id'], d['content_id'], cascade_create=True)
        purchase_requests.append(req)

    try:
        client.send(Batch(purchase_requests))
        return "Reset was Successfully"
    except:
        return "Something went wrong ! Try Again"
    

if __name__ == '__main__':
    app.run()