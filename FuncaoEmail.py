from flask import Flask, send_file, request
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

app = Flask(__name__, static_url_path='/static')

@app.route('/')
def index():
    return send_file('denuncias.html')

@app.route('/enviar', methods=['POST'])
def enviar():
    nome = request.form['nome']
    motivo = request.form['motivo']
    categoria = request.form['categoria']
    descricao = request.form['descricao']
    endereco = request.form['endereco']
    telefone = request.form['telefone']
    data = request.form['data']

    remetente = 'tbraunfelipe@gmail.com'
# https://myaccount.google.com/apppasswords <--- Link para remover ou adicionar a senha
    senha = 'amuk jcab vfop qctq'
    destinatario = 'edudigital09@fiec.com.br'

    msg = MIMEMultipart()
    msg['From'] = remetente
    msg['To'] = destinatario
    msg['Subject'] = f'Formulário de {nome}'

    corpo = f'''
Nome: {nome}
Motivo: {motivo}
Categoria: {categoria}
Descrição: {descricao}
Endereço: {endereco}
Celular: {telefone}
Data do Ocorrido: {data}
'''
    msg.attach(MIMEText(corpo, 'plain'))

    try:
        with smtplib.SMTP('smtp.gmail.com', 587) as server:
            server.starttls()
            server.login(remetente, senha)
            server.sendmail(remetente, destinatario, msg.as_string())
        return 'Email enviado com sucesso!'
    except Exception as e:
        print(f"Erro ao enviar email: {e}")
        return 'Erro ao enviar email.'

if __name__ == '__main__':
    app.run(debug=True)
