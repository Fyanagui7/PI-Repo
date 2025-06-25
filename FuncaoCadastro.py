def gerenciar_usuarios():
    usuarios = []

    while True:
        print("\n1 - Adicionar usuário")
        print("2 - Remover usuário")
        print("3 - Ver usuários")
        print("4 - Sair")

        opcao = input("Escolha uma opção (1-4): ")

        if opcao == "1":
            nome = input("Digite o nome do usuário: ").strip()
            if nome:
                usuarios.append(nome)

        elif opcao == "2":
            nome = input("Digite o nome a remover: ").strip()
            if nome in usuarios:
                usuarios.remove(nome)
            else:
                print("Usuário não encontrado.")

        elif opcao == "3":
            print("Usuários:", ", ".join(usuarios) if usuarios else "Nenhum usuário cadastrado.")

        elif opcao == "4":
            break

        else:
            print("Opção inválida. Tente novamente.")

    usuarios_str = ", ".join(usuarios)
    print("\nUsuários finais armazenados na string:")
    print(usuarios_str)
    return usuarios_str


if __name__ == "__main__":
    gerenciar_usuarios()

