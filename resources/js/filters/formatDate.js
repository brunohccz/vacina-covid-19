import { format } from "date-fns";
import { ptBR } from "date-fns/esm/locale";

export default date => {
    return format(new Date(date), "iii, dd MMMM, Y", {
        locale: ptBR
    });
};
