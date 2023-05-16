// Função para enviar o formulário usando a fetch API e retornar uma promessa
function submitForm(url, formId, resultId) {
    // Retornar uma nova promessa
    return new Promise(async (resolve, reject) => {
      // Adicionar um ouvinte de evento 'submit' ao formulário com o ID fornecido (formId)
      document.getElementById(formId).addEventListener('submit', async function (e) {
        e.preventDefault(); // Impedir o comportamento padrão de envio do formulário
  
        // Criar um FormData com os dados do formulário
        const formData = new FormData(e.target);
  
        // Enviar a requisição usando a fetch API
        try {
          const response = await fetch(url, {
            method: 'POST', // Definir o método da requisição como POST
            body: formData  // Definir o corpo da requisição com os dados do formulário
          });
  
          // Verificar se a resposta foi bem-sucedida
          if (response.ok) {
            const data = await response.text(); // Ler a resposta como texto
            // Exibir o resultado no elemento com o ID fornecido (resultId)
            document.getElementById(resultId).innerHTML = data;
            resolve(data); // Resolver a promessa com os dados da resposta
          } else {
            // Preparar o texto de erro para o caso de resposta não bem-sucedida
            const errorText = 'Erro na resposta do servidor: ' + response.status + ' ' + response.statusText;
            console.error(errorText);
            document.getElementById(resultId).innerHTML = errorText;
            reject(new Error(errorText)); // Rejeitar a promessa com o erro
          }
        } catch (error) {
          // Preparar o texto de erro para o caso de erro ao enviar a requisição
          const errorText = 'Erro ao enviar a requisição: ' + error;
          console.error(errorText);
          document.getElementById(resultId).innerHTML = errorText;
          reject(error); // Rejeitar a promessa com o erro
        }
      });
    });
  }
  