# Atividade – Criação de VNets no Azure

## 🎯 Objetivo
Criar duas VNets no Azure:
- **VNet-A** contendo **3 sub-redes**
- **VNet-B** contendo **1 sub-rede**
- Realizar o **emparelhamento entre as VNets**

---

## 1. Criar Grupo de Recursos
1. No portal do Azure, pesquise por **Grupo de Recursos**.
2. Clique em **Criar**.
3. Nome: `rg-lab-redes`
4. Região: **Brazil South**
5. Avance → **Marcações**:
   - Nome: `Ambiente`
   - Valor: `Laboratório`
6. Clique em **Revisar + Criar** → **Criar**

---

## 2. Criar a VNet-A (3 sub-redes)
1. Pesquise por **Rede Virtual** → **Criar**
2. Grupo de Recursos: `rg-lab-redes`
3. Nome: `vnet-a`
4. Região: **Brazil South**
5. Endereçamento: `10.10.0.0/16`
6. Criar sub-redes:
   - `sub-backend` → `10.10.1.0/24`
   - `sub-frontend` → `10.10.2.0/24`
   - `sub-database` → `10.10.3.0/24`
7. Marcações:
   - Nome: `Projeto`
   - Valor: `VNet-A`
8. Revisar + Criar → Criar

---

## 3. Criar a VNet-B (1 sub-rede)
1. Criar nova rede virtual
2. Grupo de Recursos: `rg-lab-redes`
3. Nome: `vnet-b`
4. Região: **East US**
5. Endereçamento: `10.20.0.0/16`
6. Criar sub-rede:
   - `sub-apps` → `10.20.1.0/24`
7. Marcações:
   - Nome: `Projeto`
   - Valor: `VNet-B`
8. Revisar + Criar → Criar

---

## 4. Emparelhar as VNets
1. Vá em **Redes Virtuais** → selecione `vnet-a`
2. Menu lateral → **Emparelhamentos** → **Adicionar**
3. Nome do link: `vnet-a-para-vnet-b`
   - Rede remota: `vnet-b`
   - Permitir acesso nos dois sentidos
4. Repita em `vnet-b`, criando o link `vnet-b-para-vnet-a`

---

## 5. Validação
- Criar 2 máquinas virtuais:
  - Uma em `vnet-a` → `sub-backend`
  - Outra em `vnet-b` → `sub-apps`
- Testar conectividade via **ping** entre as VMs  
  (lembre-se de liberar **ICMP** no grupo de segurança de rede)

---

## 📖 Entrega esperada
- Print das telas mostrando:
  - Criação das VNets e sub-redes
  - Emparelhamento funcionando
- (Opcional) Print do teste de conectividade entre VMs
