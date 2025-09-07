# ADR design pattern decision

In the context of software architecture Action, Domain, and Response (ADR) is a design pattern that helps in organizing and structuring the architecture of a software system. The ADR pattern focuses on defining clear actions, domains, and responses within the system to ensure better maintainability, scalability, and clarity.  
I decided to use this pattern, for purely selfish reasons. I had wanted to learn it for a while, and this project seemed like a good opportunity to do so.  
Most notable tradeoff(s) I see here is that it:

- introduces more files and structure to the project, which can be seen as overhead for smaller projects. However, for larger projects, the benefits of clarity and organization often outweigh this drawback.
- way more objects are created, which can lead to increased memory usage and potentially slower performance. However, the improved organization and maintainability often justify this tradeoff.
  - You can mitigate this to an extent by using a single service class to handle multiple actions, but this can lead to a loss of clarity and separation of concerns.

## Outbound links

[PMJones - ADR](https://github.com/pmjones/adr)  
[Martin Bean - ADR in laravel](https://martinbean.dev/blog/2016/10/20/implementing-adr-in-laravel/)
