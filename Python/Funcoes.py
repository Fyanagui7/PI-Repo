from flask import Flask, render_template, request
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('cadastro.html')
    
@app.route('/enviar', methods=['POST'])
def enviar():
    nome = request.form(['nome'])
    email = request.form(['email'])
    mensagem = request.form(['mensagem'])


    remetente = 'nossoemail@gmail.com'
    senha = 'nossaSenha'
    destinatario = 'email a receber a mensagem'

    msg = MIMEMultipart()
    msg['From'] = destinatario
    msg['To'] = remetente
    msg['subject'] = f'Contato de {nome}'

    corpo = f'Nome: {nome} \nEmail: {email}\nMensagem: \n{mensagem}'
    msg.attach(MIMEText(corpo, 'plain'))
   
    try:
        with smtplib.SMTP('smtp.gmail.com', 587) as server:
            server.starttls()
            server.login(remetente,senha)
            server.sendmail(remetente,destinatario, msg.as_string())
        return 'Email enviado com sucesso!'
    except Exception as e:
        print(f"Erro ao enviar email: {e}")

if __name__ == '__main__':
    app.run(debug=True)