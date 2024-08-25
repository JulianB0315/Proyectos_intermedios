import random
from werkzeug.security import generate_password_hash

#Caracteres que se van usar
abc="abcdefghijklmnopqrstuvwyz"
Manusabc=abc.upper()
numeros="0123456789"
simbolos="@{}[]*,:;?¿#$%&/()!=+-"

union= abc+Manusabc+numeros+simbolos
#Longuitud de la contraseña
tamano=8

#Bucle para genterar Contrasñas
for _ in range(10):
    nuestra=random.sample(union, tamano)
    password="".join(nuestra)
    password_encriptado=generate_password_hash(password)
    print("Contraseñas==> {} Encriptado==>{}".format(password,password_encriptado))
    print("---------------------------------------------------------------------")