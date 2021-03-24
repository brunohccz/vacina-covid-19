import { formatDistance } from "date-fns";
import { ptBR } from "date-fns/esm/locale";

export default date => {
    return formatDistance(new Date(date), new Date(), {
        addSuffix: true,
        locale: ptBR
    });
};
