import random
import string
from werkzeug.security import generate_password_hash

contenido=string.ascii_letters + string.digits + string.punctuation

#Longuitud de la contraseña
tamano=int(input("Ingresar el Tamaño de la contraseña"))

#Bucle para generar Contraseñas
for _ in range(1):
    nuestra=random.sample(contenido, tamano)
    password="".join(nuestra)
    password_encriptado=generate_password_hash(password)
    print("Contraseñas==> {} ||   Encriptado==> {}".format(password,password_encriptado))
    print("---------------------------------------------------------------------")