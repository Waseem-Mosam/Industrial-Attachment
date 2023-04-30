from django.shortcuts import render, redirect
from django.contrib import messages
from django.contrib.auth.models import auth
from .models import Student


# Create your views here.
def home(request):
    return render(request, "home.html")

def register(request):
    if (request.method == "POST"):
        username = request.POST['studentID']
        first_name = request.POST['first_name']
        last_name = request.POST['last_name']
        email = request.POST['email']
        gender = request.POST['gender']
        password = request.POST['password']
        confirm_password = request.POST['confirm_password']

        if (password==confirm_password):
            # if (Student.objects.filter(username==username).exists()):
            #     messages.info(request, 'Email already exists')
            #     return redirect(register)
            # else:
            obj=Student()
            obj.username = username
            obj.first_name = first_name
            obj.last_name = last_name
            obj.email = email
            obj.gender = gender
            obj.password = password
            obj.save()
            
            return redirect('login_user')

    else:
        return render(request, "register.html")
    
def login_user(request):
    if (request.method == 'POST'):
        username = request.POST['username']
        password = request.POST['password']

        user = auth.authenticate(username=username, password=password)

        if user is not None:
            auth.login(request, user)
            return redirect('home')
        else:
            messages.info(request, 'Invalid username or password')
            return redirect('login_user')
    else:
        return render(request, "login.html")
    
def logout_user(request):
    auth.logout(request)
    return redirect('home')
