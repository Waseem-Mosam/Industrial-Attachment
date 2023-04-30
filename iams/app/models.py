from django.db import models
from django import forms

# Create your models here.
class Student(models.Model):
    username = models.CharField(max_length=9, unique=True)
    first_name = models.CharField(max_length=50)
    last_name = models.CharField(max_length=50)
    email = models.EmailField();
    gender = models.CharField(max_length=6)
    password = models.CharField(max_length=25)

    USERNAME_FIELD = "username"
    