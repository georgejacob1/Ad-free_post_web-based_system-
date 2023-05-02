from flask import Flask, request
import tensorflow as tf
import cv2
import numpy as np

app = Flask(__name__)

# Load the pre-trained model
model = tf.keras.applications.MobileNetV2()

@app.route('/predict', methods=['POST'])
def predict():
    # Get the image file from the request
    image_file = request.files['image']

    # Load the image from file
    image = cv2.imdecode(np.frombuffer(image_file.read(), np.uint8), cv2.IMREAD_COLOR)

    # Resize the image to match the input size of the model
    image = cv2.resize(image, (224, 224))

    # Preprocess the image for the model
    image = tf.keras.applications.mobilenet_v2.preprocess_input(image)

    # Make a prediction with the model
    predictions = model.predict(np.array([image]))

    # Get the index with the highest probability
    predicted_index = np.argmax(predictions)

    # Get the name of the predicted object
    class_names = tf.keras.applications.mobilenet_v2.decode_predictions(predictions, top=1)[0][0][1]

    # Return the predicted object name as a response
    return class_names

if __name__ == '__main__':
    app.run()
