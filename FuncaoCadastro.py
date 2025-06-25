def gerenciar_usuarios():
    usuarios = []

    while True:
        print("\n1 - Adicionar usuário")
        print("2 - Remover usuário")
        print("3 - Ver usuários")
        print("4 - Sair")

        opcao = input("Escolha uma opção: ")

        if opcao == "1":
            nome = input("Digite o nome do usuário: ").strip()
            usuarios.append(nome)

        elif opcao == "2":
            nome = input("Digite o nome para remover: ").strip()
            if nome in usuarios:
                usuarios.remove(nome)
            else:
                print("Usuário não encontrado.")

        elif opcao == "3":
            print("Usuários:", ", ".join(usuarios) if usuarios else "Nenhum usuário.")

        elif opcao == "4":
            break

        else:
            print("Opção inválida. Tente novamente.")

    return ", ".join(usuarios)
