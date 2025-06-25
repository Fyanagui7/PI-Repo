import re


def validar_cpf(cpf: str) -> bool:
    
    cpf = str(input("Digite seu CPF"))
    cpf = re.sub(r'\D', '', cpf)

    
    if len(cpf) != 11 or cpf == cpf[0] * 11:
        return False

    
    soma1 = sum(int(cpf[i]) * (10 - i) for i in range(9))
    digito1 = (soma1 * 10 % 11) % 10

    
    soma2 = sum(int(cpf[i]) * (11 - i) for i in range(10))
    digito2 = (soma2 * 10 % 11) % 10

    return cpf[-2:] == f"{digito1}{digito2}"

# Exemplo de uso
cpf_teste = "123.456.789-09"
if validar_cpf(cpf_teste):
    print("CPF válido.")
else:
    print("CPF inválido.")
