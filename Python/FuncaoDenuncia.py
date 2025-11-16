def registrar_feedback():
    feedbacks = []

    while True:
        print("\nEscolha uma opção:")
        print("1 - Reclamação")
        print("2 - Elogio")
        print("3 - Denúncia")
        print("4 - Sair")

        opcao = input("Digite o número da opção: ").strip()

        if opcao == "1":
            tipo = "Reclamação"
        elif opcao == "2":
            tipo = "Elogio"
        elif opcao == "3":
            tipo = "Denúncia"
        elif opcao == "4":
            break
        else:
            print("Opção inválida, tente novamente.")
            continue

        descricao = input(f"Digite a descrição da sua {tipo.lower()}: ").strip()
        feedbacks.append((tipo, descricao))
        print(f"{tipo} registrada com sucesso!")

    print("\n--- Feedbacks registrados ---")
    for i, (tipo, desc) in enumerate(feedbacks, 1):
        print(f"{i}. [{tipo}] {desc}")

registrar_feedback()
